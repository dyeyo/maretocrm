<?php

namespace App\Exports;

use App\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ClientsExport implements FromCollection,WithHeadings
{
  public function headings(): array
  {
      return [
        'Nombre Completo del Cliente',
        'Numero de Identificación',
        'Ciudad',
        'Dirección',
        'Telefono/Celular',
        'Correo Electronico',
        'Colegio/Universidad',
        'Pago',
        'Contrato',
        'Terminos y Condiciones',
        'Terminos de Compra',
        'Terminos de Curso',
        'Terminos de Curso',
      ];
  }

  public function collection()
  {
    return Clients::select('name','numIdenficication','city','addrees','phone','email',
                          'scholl','contract','pay','terminos','terminosCompra','terminosCusro')
                          ->get();
  }
}
