@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <div class="wrapper-history">
            <div class="headbox-history">
                <div class="tabs">
                    <a href="/dashboard/history?time=month">THIS MONTH</a>
                    <a href="/dashboard/history">ALL</a>
                    <a href="/dashboard/history?time=week">THIS WEEK</a>
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
            @foreach ($records as $record)
                <div class="accordion">
                    <div class="contentbx">
                        <div class="label" data-typeAmount={{ $record->category->type->name }}>
                            <div class="left-label">
                              <i class="{{ $record->category->icon }}"></i>
                              <span>{{ $record->category->name }}</span>
                            </div>
                            <div class="right-label">
                              <span>@amount($record->amount)</span>
                              <i class='bx bx-chevron-down icon-arrow'></i>
                            </div>
                        </div>
                        <div class="history">
                            <div class="detail">
                                <h3>{{ $record->category->name }}</h3>
                                <p>{{ auth()->user()->name . "'s wallet" }}</p>
                                <p>{{ Carbon::create($record->created_at)->toFormattedDateString() }}</p>
                            </div>
                            <div class="biaya">
                                <p>
                                    @if ($record->note)
                                        {{ $record->note }}
                                    @endif
                                </p>
                                <h3>@amount($record->amount)</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $records->links() }}
    </div>
@endsection
@section('js')
    <script>
      const accordion = document.querySelectorAll('.contentbx');
      const row = document.querySelector('.bx-chevron-down');
      const label = document.querySelectorAll('.label');

      for (let i = 0; i < label.length; i++) {
        let labelType = label[i].getAttribute("data-typeAmount")
        if(labelType == "EXPENSE"){
          label[i].classList.add("expense-label")
        }
      }

      // expense[1].innerHTML
      // if(expense.length.innerText = '-'){
      //   for(let x = )
      // }
      
      // const label = document.getElementsByClassName('label');
      // if(expense.value == true ) {
      //   label.style.backgroundColor = 'green';
      // }
      // if(expense.value = '-'){
      //   label.style.backgroundColor = 'rgb(43 48 255)';
      // }
      
      for (let i = 0; i < accordion.length; i++) {
        accordion[i].addEventListener("click" , function(){
          accordion[i].classList.toggle("active")
          let elmArrow = accordion[i].querySelector(".icon-arrow")

          elmArrow.classList.replace('bx-chevron-down', 'bx-chevron-up');
          if(accordion[i].classList.contains("active") == false){
              elmArrow.classList.replace('bx-chevron-up', 'bx-chevron-down');
          }
        })
      }
      
      
        
      // accordion.forEach(elm => {
      //     elm.addEventListener("click" , e => {
      //       elm.classList.toggle("active")
      //       let elmArrow = elm.querySelector(".icon-arrow")

      //       elmArrow.classList.replace('bx-chevron-down', 'bx-chevron-up');
      //       if(elm.classList.contains("active") == false){
      //           elmArrow.classList.replace('bx-chevron-up', 'bx-chevron-down');
      //       }
      //     })
      // })
        // const accordion = document.getElementsByClassName('contentbx');
        // const row = document.querySelector('.bx-chevron-down');
        
        // for (i = 0; i < accordion.length; i++) {
        //   accordion[i].addEventListener('click', function() {
        //     this.classList.toggle('active')

        //     this.

        //     row.classList.replace('bx-chevron-down', 'bx-chevron-up');
        //     if(this.classList.contains('active') == false) {
        //       row.classList.replace('bx-chevron-up', 'bx-chevron-down');
        //     }
        //     // label[0].style.transition = '0.4s 0.4s';
        //       // label[0].style.transition = 'none';
        //     })
        // }
    </script>
@endsection
