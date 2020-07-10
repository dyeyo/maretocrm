<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Contracts;
use App\Mail\SendMailContractAdmin;
use App\Mail\SendMailContractClient;
use App\TemplateEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContractController extends Controller
{
  public function index()
  {
    $contracts = Contracts::all();
    $templatesEmail = TemplateEmail::where('id', '>', 2)->get();
    return view('formsContrato.index', compact('contracts', 'templatesEmail'));
  }

  public function contract()
  {
    $contractsCount = Contracts::count();
    $s = $_GET['contrato'];
    $contract = Contracts::where('id', $_GET['contrato'])->get();
    $tituloContrato = $contract[0]->title;
    $date_now = date("Y-m-d");
    $date_now_hours = date("Y-m-d H:i:s");
    return view('formsContrato.contract', compact('contractsCount', 'contract', 'date_now', 'date_now_hours', 'tituloContrato'));
  }

  public function store(Request $request)
  {
    Contracts::create($request->all());
    Session::flash('message', 'Contrato creado con exito');
    return redirect()->route('contracs');
  }

  public function editContract(Request $request, $id)
  {
    $contract = Contracts::with('emails')->find($id);
    $templatesEmail = TemplateEmail::where('id', '>', 2)->get();
    return view('formsContrato.edit', compact('contract', 'templatesEmail'));
  }

  public function updateContract(Request $request, $id)
  {
    $contract = Contracts::find($id);
    $contract->title = $request->title;
    $contract->firstText = $request->firstText;
    $contract->secondText = $request->secondText;
    $contract->save();
    Session::flash('message', 'Contrato editado con exito');
    return redirect()->route('contracs');
  }

  public function contractPay(Request $request)
  {
    $client = Clients::find($request->clientId);
    $client->name = $request->name;
    $client->addrees = $request->addrees;
    $client->city = $request->city;
    $client->numIdenficication = $request->numIdenficication;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->contract = $request->contract;
    $client->scholl = $request->scholl;
    $client->pay = $request->pay;
    $client->terminos = $request->terminos;
    $client->terminosCompra = $request->terminosCompra;
    $client->terminosCusro = $request->terminosCusro;
    $client->asesorId  = $request->asesorId;
    $client->titleContract  = $request->titleContract;
    $client->update();

    Mail::to($request->email)->send(new  SendMailContractClient());
    Mail::to(env('EMAIL_ADMIN'))->send(new SendMailContractAdmin());
    Session::flash('message', 'Correo electronico enviado y Cliente registrado con exito');
    return redirect()->route('home');
  }

  public function destroy($id)
  {
    Contracts::find($id)->delete();
    Session::flash('message', 'Contrato eliminada con exito');
    return redirect()->route('contracs');
  }
}
