@extends('dashboard.layout.template')
@section('content')
<div class="wrapper">
    <!-- Histori Tabel Transaksi -->
    <div class="tabelTransaksi">
      <div class="container">
        <table class="table-fill">
          <thead>
            <tr class="JudulTabel">
              <th class="text-left">Latest Transaction</th>
              <th class="text-left">Originated</th>
              <th class="text-left">Amount</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            <tr>
              <td class="text-left">January/11/1825</td>
              <td class="text-left">Pt.Louis Vuitton</td>
              <td class="text-left">-Rp 50,000.00</td>
            </tr>
            <tr>
              <td class="text-left">October/20/1679</td>
              <td class="text-left">Pt.Nike</td>
              <td class="text-left">-Rp 18,000.00</td>
            </tr>
            <tr>
              <td class="text-left">September/11/2001</td>
              <td class="text-left">Pt.Ford</td>
              <td class="text-left">-Rp 1,678,000.00</td>
            </tr>
            <tr>
              <td class="text-left">August/19/230bc</td>
              <td class="text-left">Pt.Tesla</td>
              <td class="text-left">-Rp 5,350,000.00</td>
            </tr>
            <tr>
              <td class="text-left">Juny/9/1548</td>
              <td class="text-left">Pt.Gucci</td>
              <td class="text-left">-Rp 145,000.00</td>
            </tr>
            <tr>
              <td class="text-left">November/9/1941</td>
              <td class="text-left">Pt.Mecedes Benz</td>
              <td class="text-left">-Rp 2,560,000.00</td>
            </tr>
            <tr>
              <td class="text-left">November/9/1941</td>
              <td class="text-left">Pt.Rolex</td>
              <td class="text-left">-Rp 269,000.00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection