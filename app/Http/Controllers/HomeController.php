<?php

namespace SerMkApi\Http\Controllers;

use SerMkApi\Services\RouterOS\RouterOsClientService;
use SerMkApi\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use SerMkApi\Http\Controllers\RouterosApi;

use PEAR2\Net\RouterOS;


class HomeController extends Controller
{
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RouterOsClientService $service)
    {
        $this->service = $service;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function teste()
    {
        //Criei um papel
        //$role = Role::create(['name' => 'ALUNO']);
        //Criei uma permissao
        //$permission = Permission::create(['name' => 'create aluno']);
        //Atricui a premissao a um papel
        //$role->givePermissionTo($permission);

        $user = User::find(1);
        //dd($permissions = $user->permissions);
        //$user->assignRole('ALUNO');

        //Verifica se tem determonada permissao
        //dd($user->can('creaste aluno') );
        //dd($user->hasPermissionTo('create aluno'));

        //Verifica se tem um papel
        //dd($user->hasAnyRole('ALAUNO'));

        ///$role = Role::findByName('ALUNO');
        //dd($role->hasAnyPermission(['creates aluno']));

        try {

//            $API = new RouterosAPI();
//            $API->debug = true;
//
//            $API->connect('170.245.65.134', 'NetSerb', 'nets@2017#');
//            $API->write('/interface/print');
//            $READ = $API->read(false);
//            $ARRAY = $API->parseResponse($READ);
//            //print_r($ARRAY);
//            dd($ARRAY);

            //dd($this->service);

            //$client = new RouterOS\Client('170.245.65.134', 'NetSerb', 'nets@2017#');
            $request = new RouterOS\Request('/interface/print');
            $reponse = $this->service->sendSync($request);

            dd($reponse);
        } catch (Exception $e) {
            die('Unable to connect to the router.');
        }

    }
}
