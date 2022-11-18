@extends('dashboard.layout.template')
@section('content')
    <div class="wrapper">
        <div class="wrapper-history">
            <div class="headbox-history">
                <div class="tabs">
                    <a href="/dashboard/history?t=month" class="@if (request('t') == 'month') active @endif">THIS
                        MONTH</a>
                    <a href="/dashboard/history" class="@if (!request('t')) active @endif">ALL</a>
                    <a href="/dashboard/history?t=week" class="@if (request('t') == 'week') active @endif">THIS WEEK</a>
                </div>
                <div class="transaction">
                    <div class="inflow">
                        <p>Inflow</p>
                        <span>@amount($addition['inflow'])</span>
                    </div>
                    <div class="outflow">
                        <p>Outflow</p>
                        <span>@amount($addition['outflow'])</span>
                    </div>
                    <div class="total">
                        <p>Total</p>
                        <span>@amount($addition['total'])</span>
                    </div>
                </div>
            </div>
            @foreach ($recordsByDate as $key => $recordsData)
                <div class="history-date">
                    <p>
                        <span>
                            {{ Carbon::create($key)->day }}
                        </span>
                        {{ Carbon::create($key)->shortEnglishMonth }}
                        {{ Carbon::create($key)->year }}
                    </p>
                </div>
                @foreach ($recordsData as $record)
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
                                    <div class="head-detail">
                                        <h3>{{ $record->category->name }}</h3>
                                        <div class="delete-edit">
                                            <form action="/dashboard/record/{{ $record->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"><i class='bx bx-trash'></i></button>
                                            </form>
                                            <a href="/dashboard/record/{{ $record->id }}/edit"><i
                                                    class='bx bx-pencil'></i></a>
                                        </div>
                                    </div>
                                    <p>{{ auth()->user()->name . "'s wallet" }}</p>
                                    <p>{{ Carbon::create($record->date)->toFormattedDateString() }}</p>
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
            @endforeach
        </div>
        {{ $records->links() }}
    </div>
@endsection
@section('js')
    <script>
        const accordion = document.querySelectorAll('.contentbx');
        const row = document.querySelector('.bx-chevron-down');
        const expense = document.querySelectorAll('.right-label span');
        const label = document.querySelectorAll('.label');

        for (let i = 0; i < label.length; i++) {
            let labelType = label[i].getAttribute("data-typeAmount")
            if (labelType == "EXPENSE") {
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
            accordion[i].addEventListener("click", function() {
                accordion[i].classList.toggle("active")
                let elmArrow = accordion[i].querySelector(".icon-arrow")

                elmArrow.classList.replace('bx-chevron-down', 'bx-chevron-up');
                if (accordion[i].classList.contains("active") == false) {
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
