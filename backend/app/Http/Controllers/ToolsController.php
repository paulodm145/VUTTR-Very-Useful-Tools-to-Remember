<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\ToolsRepository;
use App\Tools;

class ToolsController extends Controller
{
    protected $tool;

    public function __construct(Tools $tools)
    {
       $this->tool = new ToolsRepository($tools);
    }

    public function index()
    {
       return $this->tool->all();
    }

    public function store(Request $request){
        return $this->tool->create($request->all());
    }

    public function show($id){
        $data = $this->tool->show($id);
        return response()->json($data) 
                         ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK])
                         ->header('Content-Type', 'application/json');
    }

    public function search($type = "tags", $text=''){
        return $this->tool->search($type, $text);
    }

    public function destroy($id){
        if($this->tool->delete($id)){
            return response('No Content', 204);
        }
    }

}
