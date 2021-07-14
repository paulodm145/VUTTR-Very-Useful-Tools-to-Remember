<?php 
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Tags;


class ToolsRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        /*
        * Anotação meramente técnica.
        * Abaixo código SQL que foi convertido seguindo os recursos do Laravel
        * SELECT * FROM  tools INNER JOIN (SELECT tool_id, group_concat(NAME SEPARATOR ',' ) tags FROM tags GROUP BY tool_id) tagList ON tools.id = tagList.tool_id;
        */
        $tags = DB::table('tags')->select('tool_id', DB::raw("group_concat(NAME SEPARATOR ',' ) tags"))
                                 ->groupBy('tool_id');

        return DB::table('tools')->select('id', 'title', 'link', 'description', 'tags')
                                 ->joinSub($tags, 'tagList', function ($join){
                                        $join->on('tools.id', '=','tagList.tool_id');
                                })->get();
    }

    public function allWithouTags(){
        return  $this->model->all();
    }

    public function create(array $data)
    {
        $dataToSave = [
                        "title"       => $data['title'],
                        "link"        => $data['link'],
                        "description" => $data['description']
                    ];
        
        $toolID = $this->model->create($dataToSave);
        
        if( $toolID ){
            if( count($data['tags']) > 0 ){
                foreach($data['tags'] as $key=>$value){
                    Tags::create([
                                    "name"=>$value,
                                    "tool_id"=> $this->lastId()
                    ]);
                }
            }
        }

        return $this->show($this->lastId());
    }

    public function lastId(){
        return ( $this->getModel()::latest('id')->first() )->id;
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        $id = $id+0;
        $tags = DB::table('tags')->select('tool_id', DB::raw("group_concat(NAME SEPARATOR ',' ) tags"))->groupBy('tool_id');

        return DB::table('tools')->select('id', 'title', 'link', 'description', 'tags')
                ->where('tools.id', $id)
                ->joinSub($tags, 'tagList', function ($join){
                    $join->on('tools.id', '=','tagList.tool_id');
            })->get();
    }

    public function search($type, $term){
        if($type == "tags"){
            $field = 'tagList.tags';
        }else{
            $field = 'tools.title';
        }
            $tags = DB::table('tags')->select('tool_id', DB::raw("group_concat(NAME SEPARATOR ',' ) tags"))->groupBy('tool_id');

            return DB::table('tools')->select('id', 'title', 'link', 'description', 'tags')
                    ->joinSub($tags, 'tagList', function ($join){
                        $join->on('tools.id', '=','tagList.tool_id');
                })
                ->where($field,'LIKE','%'.$term.'%')
                ->get();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}