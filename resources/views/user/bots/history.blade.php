@extends('layouts.user')

@section('contents')
    <div class="container-fluid">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">History</h4>

        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
            <li class="breadcrumb-item active">History</li>
          </ol>
        </div>

      </div>
    </div>
  </div>
  <!-- end page title -->
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header bg-primary text-white">History</h5>
      <div class="card-body">

        <script language="javascript">
          function go(p) {
            document.opts.page.value = p;
            document.opts.submit();
          }
        </script>




        <div class="row">
          <div class="col-md-12">
            <form method="post" name="opts"><input type="hidden" name="form_id" value="17102892036194"><input
                type="hidden" name="form_token" value="f61722bb0d4c9a63f0f1b597dae54232">
              <input type="hidden" name="a" value="earnings">
              <input type="hidden" name="page" value="1">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <select name="type" class="form-control" onchange="document.opts.submit();">
                        <option value="">All transactions</option>
                        <option value="add_funds">Transfer from external processings</option>
                        <option value="commissions">Referral commission</option>
                        <option value="deposit" selected="">Deposit</option>
                        <option value="earning">Earning</option>
                        <option value="release_deposit">Deposit returned to user account</option>
                        <option value="withdrawal">Withdrawal</option>
                        <option value="withdraw_pending">Withdrawal request</option>
                      </select>
                    </div>

                    <div class="col-md-1">
                      <label>From:</label>
                    </div>
                    <div class="col-md-2">
                      <select name="month_from" class="form-control">
                        <option value="1">Jan
                        </option>
                        <option value="2" selected="">Feb
                        </option>
                        <option value="3">Mar
                        </option>
                        <option value="4">Apr
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">Jun
                        </option>
                        <option value="7">Jul
                        </option>
                        <option value="8">Aug
                        </option>
                        <option value="9">Sep
                        </option>
                        <option value="10">Oct
                        </option>
                        <option value="11">Nov
                        </option>
                        <option value="12">Dec
                        </option>
                      </select> &nbsp;
                    </div>
                    <div class="col-md-2">
                      <select name="day_from" class="form-control">
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                        <option value="3">3
                        </option>
                        <option value="4">4
                        </option>
                        <option value="5">5
                        </option>
                        <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                        <option value="8">8
                        </option>
                        <option value="9">9
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27" selected="">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                      </select> &nbsp;
                    </div>
                    <div class="col-md-2">
                      <select name="year_from" class="form-control">
                        <option value="2013">2013
                        </option>
                        <option value="2014">2014
                        </option>
                        <option value="2015">2015
                        </option>
                        <option value="2016">2016
                        </option>
                        <option value="2017">2017
                        </option>
                        <option value="2018">2018
                        </option>
                        <option value="2019">2019
                        </option>
                        <option value="2020">2020
                        </option>
                        <option value="2021">2021
                        </option>
                        <option value="2022">2022
                        </option>
                        <option value="2023" selected="">2023
                        </option>
                        <option value="2024">2024
                        </option>
                      </select><br><img src="images/q.gif" width="1" height="4"><br>

                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4">
                      <br><img src="images/q.gif" width="1" height="4"><br>
                      <select name="ec" class="form-control">
                        <option value="-1">All eCurrencies</option>
                        <option value="1006">USDT TRC20</option>
                      </select>
                    </div>

                    <div class="col-md-1">
                      <label>To:</label>
                    </div>
                    <div class="col-md-2">
                      <select name="month_to" class="form-control">
                        <option value="1">Jan
                        </option>
                        <option value="2">Feb
                        </option>
                        <option value="3" selected="">Mar
                        </option>
                        <option value="4">Apr
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">Jun
                        </option>
                        <option value="7">Jul
                        </option>
                        <option value="8">Aug
                        </option>
                        <option value="9">Sep
                        </option>
                        <option value="10">Oct
                        </option>
                        <option value="11">Nov
                        </option>
                        <option value="12">Dec
                        </option>
                      </select> &nbsp;
                    </div>
                    <div class="col-md-2">
                      <select name="day_to" class="form-control">
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                        <option value="3">3
                        </option>
                        <option value="4">4
                        </option>
                        <option value="5">5
                        </option>
                        <option value="6">6
                        </option>
                        <option value="7">7
                        </option>
                        <option value="8">8
                        </option>
                        <option value="9">9
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12" selected="">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                      </select> &nbsp;
                    </div>
                    <div class="col-md-2">
                      <select name="year_to" class="form-control">
                        <option value="2013">2013
                        </option>
                        <option value="2014">2014
                        </option>
                        <option value="2015">2015
                        </option>
                        <option value="2016">2016
                        </option>
                        <option value="2017">2017
                        </option>
                        <option value="2018">2018
                        </option>
                        <option value="2019">2019
                        </option>
                        <option value="2020">2020
                        </option>
                        <option value="2021">2021
                        </option>
                        <option value="2022">2022
                        </option>
                        <option value="2023">2023
                        </option>
                        <option value="2024" selected="">2024
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4">
                  &nbsp; <input type="submit" value="Go" class="btn btn-primary ml-auto">
                </div>
              </div>
            </form>
          </div>
        </div>
        <br><br>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><b>Type</b></th>
                <th><b>Amount</b></th>
                <th><b>Date</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 150000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Jan-8-2024 01:02:11 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 150000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Dec-9-2023 01:02:11 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Executive Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 53060.55</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Nov-29-2023 12:53:38 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 53060.55</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Nov-9-2023 12:53:38 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Standard Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 100030.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Jul-29-2023 01:04:30 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 100030.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Jun-29-2023 01:04:30 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Executive Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 70000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Jun-26-2023 06:49:54 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 70000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Jun-6-2023 06:49:54 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Standard Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 60000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>May-30-2023 05:25:06 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 60000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>May-10-2023 05:25:06 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Standard Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 40000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>May-9-2023 12:57:01 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 40000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Apr-19-2023 12:57:01 PM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Standard Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 30000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Apr-17-2023 09:12:15 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 30000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-28-2023 09:12:15 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Standard Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 10000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-17-2023 04:06:35 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 8000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-17-2023 04:05:19 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 10000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-11-2023 04:06:35 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Basic Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit</b></td>
                <td><b>$ 8000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-11-2023 04:05:19 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit to Basic Plan</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 4000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-7-2023 06:57:40 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>
              <tr>
                <td><b>Deposit returned to user account</b></td>
                <td><b>$ 4000.00</b> <img src="images/1006.gif" align="absmiddle" hspace="1" height="17"></td>
                <td><b><small>Mar-5-2023 10:40:09 AM</small></b></td>
              </tr>
              <tr>
                <td class="gray"><small>Deposit return</small></td>
              </tr>


              <tr>
                <td colspan="2">For this period:</td>
                <td align="right"><b>$ 0.00</b></td>
              </tr>
              <tr>
                <td colspan="2">Total:</td>
                <td align="right"><b>$ 0.00</b></td>
              </tr>
            </tbody>
          </table>
        </div>

        <center>
          1
          <a href="javascript:go('2')">2</a>
          <a href="javascript:go('2')">&gt;&gt;</a>
        </center>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    @foreach ($activations as $item)
        <script>
            $(document).ready(function() {
                var target = "{{ 'bot_timer_' . $item->id }}";
                var expires_in = {{ $item->expires_in }};

                // Get the current time in milliseconds
                var currentTime = new Date().getTime();

                // Calculate the remaining time in milliseconds
                var remainingTime = expires_in * 1000 - currentTime;

                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                // Display the countdown
                var countdownElement = document.getElementById(target);
                countdownElement.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";

                // Update the countdown every second
                var countdownInterval = setInterval(function() {
                    if (remainingTime > 0) {
                        remainingTime -= 1000;

                        days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                        hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                        seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                        countdownElement.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds +
                            "s";
                    } else {
                        clearInterval(countdownInterval);
                        countdownElement.innerHTML = "Expired";
                    }
                }, 1000);
            });
        </script>
    @endforeach
    <script>
        let interval;


        // select the bot bot
        $(document).on('click', ".bot", function(e) {


            var bot_id = $(this).data('bot_id');
            var bot_name = $(this).data('bot_name');

            Swal.fire({
                html: `
                    <div class="mt-5">
                        <div>
                            <div class=" text-white px-2 py-5 w-full rounded-lg border border-slate-800 hover:border-slate-600">
                                <form action="{{ route('user.bots.new') }}" method="post" id="botForm">
                                    @csrf
                                    <input type="hidden" name="bot_id" id="bot_id">
                                    <p class="mb-3">You have chosen to activate <span class="text-orange-500" id="dispay_bot_name"></span>  Ai bot</p>
                                    <p class="mb-3 text-red-500 text-xs" id="errorMessage"></p>
                                    <div class="flex justify-end mb-5">
                                        <div class="grid grid-cols-1 mb-2 mt-5 w-full">
                                            <div class="relative">

                                                <span class="theme1-input-icon material-icons">
                                                    paid
                                                </span>
                                                <input type="number" step="any"
                                                    placeholder="Capital ({{ site('currency') }})" id="capital"
                                                    class="theme1-text-input" name="capital" value="0" required>
                                                <label for="capital"
                                                    class="placeholder-label text-gray-300  px-2">Capital
                                                    ({{ site('currency') }})
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-10 mb-10 px-3 flex flex-start">
                                        <button type="submit" id="activateButton"
                                            class="bg-purple-500 px-2 py-1 rounded-lg hover:scale-110 transition-all"> Activate Now
                                        </button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                `,
                toast: false,
                background: 'rgb(7, 3, 12, 0)',
                showConfirmButton: false,
                showCancelButton: false,
                showCloseButton: true,
                allowEscapeKey: false,
                allowOutsideClick: false,



            });

            $('#dispay_bot_name').html(bot_name);
            $("#bot_id").val(bot_id);




        });

        // handle deposit form
        $(document).on('submit', '#botForm', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(this);

            var submitButton = $(this).find('button[type="submit"]');
            submitButton.addClass('relative disabled');
            submitButton.append('<span class="button-spinner"></span>');
            submitButton.prop('disabled', true);
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    var link = window.location.href;
                    var targetDiv = '#bots';
                    $.ajax({
                        url: link,
                        method: 'GET',
                        success: function(response) {
                            $(targetDiv).html($(response).find(targetDiv).html());
                            var scrollTo = $(targetDiv).offset().top - 100;
                            $('.rescron-card').addClass('hidden');
                            $(targetDiv).removeClass('hidden');
                            $('html, body').animate({
                                scrollTop: scrollTo
                            }, 800);
                        }
                    });
                    toastNotify('success', 'Bot activated successfully');


                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;

                    if (errors) {
                        $.each(errors, function(field, messages) {
                            var fieldErrors = '';
                            $.each(messages, function(index, message) {
                                fieldErrors += message + '<br>';
                            });
                            $('#errorMessage').html(fieldErrors);
                        });
                    } else {
                        $('#errorMessage').html('error', 'An Error occured, try again later');
                    }


                },
                complete: function() {
                    submitButton.removeClass('disabled');
                    submitButton.find('.button-spinner').remove();
                    submitButton.prop('disabled', false);

                }
            });

        });
    </script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        var profits = {!! json_encode($profits) !!};
        var profitInt = profits.map(value => parseFloat((value * 1).toFixed(2)));

        Highcharts.chart('profitChart', {
            chart: {
                type: 'spline',
                backgroundColor: '#1f1a23', // Set background color here

                plotBackgroundColor: '#1f1a23',
                plotBorderWidth: 1,
                plotBorderColor: 'rgb(168, 85, 247)',

                borderWidth: 0,
                borderColor: 'rgb(168, 85, 247)',
                borderRadius: 10,
                style: {
                    fontFamily: 'Arial, sans-serif',
                    fontSize: '14px',
                    color: '#fff'
                }
            },
            accessibility: {
                point: {
                    descriptionFormatter: function(p) {
                        return p.series.name + ', ' + p.category + ', ' + p.y + '{{ site('currency') }}.';
                    }
                }
            },
            title: {
                text: '<span style="color: white">30 Days PNL</span>'
            },
            subtitle: {
                text: 'PNL Chart history for the last 30 days'
            },
            xAxis: {
                categories: {!! json_encode($days) !!},
                crosshair: true
            },
            yAxis: {
                // min: 0,
                title: {
                    text: '<span style="color: white">PNL ({{ site('currency') }})</span>'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size: 10px">{point.key} PNL</span><br/>',
                valuePrefix: '{{ site('currency') }}'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'PNL',
                data: profitInt
            }]
        });
    </script>

    {{-- view trading history chart --}}
    <script src="https://s3.tradingview.com/tv.js"></script>
    <script>
        $(document).on('click', '.view-chart', function(e) {
            var pair = $(this).data('pair'); // BTCUSDT

            //fetch trading view chart for the pair
            Swal.fire({
                html: `
                        <div class="mt-5 sm:overflow-x-scroll">
                            <div id="chart-container"></div>
                        </div>
                        `,
                toast: false,
                background: 'rgb(7, 3, 12, 0)',
                showConfirmButton: false,
                showCloseButton: true,
                position: 'top-left',
                allowEscapeKey: false, // Prevent closing by escape key
                allowOutsideClick: false, // Prevent closing by clicking backdrop
                willClose: () => {
                    //delete the previously generated qrcode
                    // $('#single_wallet_qrcode').html('');
                }
            });

            new TradingView.widget({
                // Define the container element for the widget
                container_id: 'chart-container', // Replace 'chart-container' with your actual container ID

                // Specify the symbol (pair) you want to display
                symbol: pair,

                // Specify the interval for the chart (e.g., '1D' for 1 day)
                interval: '1D',

                // Choose the style of the chart (e.g., 'Line' or 'Candles')
                style: 'Candles',

                // Specify the timezone for the chart
                timezone: 'Etc/UTC',
                theme: 'Dark'

            });

        });
    </script>
@endsection
