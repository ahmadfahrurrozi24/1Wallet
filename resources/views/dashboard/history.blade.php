@extends('dashboard.layout.template')
@section('content')
<div class="wrapper">
    {{-- <!-- Histori Tabel Transaksi -->
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
    </div> --}}
    <div class="wrapper-history">
      <div class="headbox-history">
        {{-- <div class="tabs">
          <a href="">This Month</a>
          <a href="">All</a>
          <a href="">This Week</a>
        </div> --}}
        <div class="tabs">
          <a href="#">THIS MONTH</a>
          <a href="#">ALL</a>
          <a href="#">THIS WEEK</a>
        </div>
        <div class="transaction">
          <div class="inflow">
            <p>Inflow</p>
            <span>+Rp 100.000</span>
          </div>
          <div class="outflow">
            <p>Outflow</p>
            <span>-Rp 20.000</span>
          </div>
          <div class="total">
            <p>Total</p>
            <span>+Rp 80.000</span>
          </div>
        </div>
      </div>
      <div class="accordion">
        <div class="contentbx">
            <div class="label">
              <h1>21</h1>
              <span>Food & Beverage</span>
            </div>
            <div class="history">
                <div class="detail">
                  <h3>Food & Beverage</h3>
                  <p>Dimas walet</p>
                  <p>Friday, 21/10/2022</p>
                </div>
                <div class="biaya">
                  <p>Beli Nasi</p>
                  <h3>-Rp 100.000</h3>
                </div>
  
                {{-- <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                  </select> --}}
            </div>
         </div>
      </div>
      <div class="accordion">
        <div class="contentbx">
            <div class="label">
              <h1>21</h1>
              <span>Food & Beverage</span>
            </div>
            <div class="history">
                <div class="detail">
                  <h3>Food & Beverage</h3>
                  <p>Dimas walet</p>
                  <p>Friday, 21/10/2022</p>
                </div>
                <div class="biaya">
                  <p>Beli Nasi</p>
                  <h3>-Rp 100.000</h3>
                </div>
  
                {{-- <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                  </select> --}}
            </div>
         </div>
      </div>
    </div>

  </div>
@endsection
@section('js')
<script>
  const accordion = document.getElementsByClassName('contentbx');
  
  for (i = 0; i<accordion.length; i++){
      accordion[i].addEventListener('click', function(){
          this.classList.toggle('active')
      }) 
  }
</script>
@endsection