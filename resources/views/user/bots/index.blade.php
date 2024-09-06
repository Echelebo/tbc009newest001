@extends('layouts.fronty')

@section('contents')
    <div class="container-fluid">
        <!-- start page title -->

        <!-- end page title -->
        <div class="col-sm-12">


            <!-- script -->

            <script language="javascript">
                < !-
                function openCalculator(id) {

                    w = 225;
                    h = 400;
                    t = (screen.height - h - 30) / 2;
                    l = (screen.width - w - 30) / 2;
                    window.open('?a=calendar&type=' + id, 'calculator' + id, "top=" + t + ",left=" + l + ",width=" + w +
                        ",height=" + h + ",resizable=1,scrollbars=0");



                    for (i = 0; i < document.spendform.h_id.length; i++) {
                        if (document.spendform.h_id[i].value == id) {
                            document.spendform.h_id[i].checked = true;
                        }
                    }



                }

                function updateCompound() {
                    var id = 0;
                    var tt = document.spendform.h_id.type;
                    if (tt && tt.toLowerCase() == 'hidden') {
                        id = document.spendform.h_id.value;
                    } else {
                        for (i = 0; i < document.spendform.h_id.length; i++) {
                            if (document.spendform.h_id[i].checked) {
                                id = document.spendform.h_id[i].value;
                            }
                        }
                    }

                    var cpObj = document.getElementById('compound_percents');
                    if (cpObj) {
                        while (cpObj.options.length != 0) {
                            cpObj.options[0] = null;
                        }
                    }

                    if (cps[id] && cps[id].length > 0) {
                        document.getElementById('coumpond_block').style.display = '';

                        for (i in cps[id]) {
                            cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
                        }
                    } else {
                        document.getElementById('coumpond_block').style.display = 'none';
                    }
                }
                var cps = {}; -
                >
            </script>

            <!-- edn of script -->





            <br>
            <div class="card" id="pageContent">
                <h5 class="card-header bg-primary text-white">TBC Exchange
                </h5>
                <div class="card-body">
                    <form action="{{ route('user.bots.new') }}" method="post" id="tbctransferForm" name="spendform">
                        @csrf
                        <div class="table-responsive">
                            @foreach ($bots as $bot)
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">

                                                <input type="radio" id="bot_id" name="bot_id"
                                                    value="{{ $bot->id }}" onclick="updateCompound()" required>
                                                <b>{{ $bot->name }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="inheader">Plan</td>
                                            <td class="inheader" width="200">Exchange Amount ($)
                                            </td>
                                            <td class="inheader" width="200">Duration (days)
                                            </td>
                                            <td class="inheader" width="100" nowrap="">
                                                <nobr>Daily Return (%)
                                                </nobr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="item">{{ $bot->name }}</td>
                                            <td class="item" align="left">
                                                @if ($bot->max >= 100000000)
                                                    ${{ number_format($bot->min) . ' and more' }}
                                                @else
                                                    ${{ number_format($bot->min) . ' - $' . number_format($bot->max) }}
                                                @endif
                                            </td>
                                            <td class="item" align="left">
                                                {{ $bot->duration }} Days
                                            </td>
                                            <td class="item" align="left">
                                                {{ $bot->daily_min . '%' }}</td>
                                        </tr>

                                    </tbody>
                                </table><br><br>

                                <script>
                                    cps[{{ $bot->id }}] = [];
                                </script>
                            @endforeach
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Your account balance ($):
                                        </td>
                                        <td align="right">
                                            ${{ number_format(user()->exch_balance, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;

                                        </td>
                                        <td align="right">
                                            <small>${{ number_format(user()->exch_balance, 2) }} of USDT<br></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount to Swap ($):</td>
                                        <td align="right">
                                            <input type="text" name="capital" id="capital" class="form-control"
                                                size="15" style="text-align:right;" placeholder="Amount To Swap ($)"
                                                required>
                                        </td>
                                    </tr>



                                    <tr id="coumpond_block" style="display:none">
                                        <td>Compounding(%):</td>
                                        <td align=right>
                                            <select name="compound" class=inpts id="compound_percents"></select>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><input type="radio" name="type" value="0" required>
                                                        </td>
                                                        <td>Exchange fee from the Account Balance
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" name="type" value="1">
                                                        </td>
                                                        <td>Exchange fee from USDT
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <p class="mb-3 text-red-500 " id="errorMessage"></p>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" value="Deposit" id="activateButton-x"
                                                class="btn bg-blue-500 btn-primary ml-auto">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
        </form>

        <script language=javascript>
            for (i = 0; i < document.spendform.type.length; i++) {
                if ((document.spendform.type[i].value.match(/^process_/))) {
                    document.spendform.type[i].checked = true;
                    break;
                }
            }
            updateCompound();
        </script>
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
            if ($('input[name=type]:checked').val() == 1) {
                botForm.submit();
            } else {

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
                        toastNotify('success', 'Plan activated successfully');


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

            };


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

    <script>
        $(document).on('submit', '#tbctransferForm', function(e) {
            e.preventDefault();
            var bot_id = $('#bot_id').val() * 1;
            var capital = $('#capital').val() * 1;
            var compound = $('#compound').val() * 1;
            var type = $('#type').val() * 1;

            //check the currency code
            var error = null;
            //check min and max transfer

            if (error === null) {
                var form = $(this);
                var formData = new FormData(this);

                var submitButton = $(this).find('button[type="submit"]');
                submitButton.addClass('relative disabled');
                submitButton.append('<span class="button-spinner"></span>');
                submitButton.prop('disabled', true);

                if ($('input[name=type]:checked').val() == 1) {
                    tbctransferForm.submit();
                } else {
                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(response) {

                            window.location.reload();


                            loadPage(form.attr('action'), submitButton, '#pageContent');

                            $('html, body').animate({
                                scrollTop: 0 + 100
                            }, 800);
                            toastNotify('success', response.message);




                        },
                        error: function(xhr, status, error) {
                            var errors = xhr.responseJSON.errors;

                            if (errors) {
                                $.each(errors, function(field, messages) {
                                    var fieldErrors = '';
                                    $.each(messages, function(index, message) {
                                        fieldErrors += message + '<br>';
                                    });
                                    toastNotify('error', fieldErrors);
                                });
                            } else {
                                toastNotify('error', 'An Error occured, try again later');
                            }


                        },
                        complete: function() {
                            submitButton.removeClass('disabled');
                            submitButton.find('.button-spinner').remove();
                            submitButton.prop('disabled', false);

                        }
                    });
                }
            } else {

                toastNotify('error', error);

            }

        });
    </script>
@endsection
