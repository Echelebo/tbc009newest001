@extends('layouts.admin')

@section('contents')
    <div class="w-full w-full p-3 mb-2 grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 gap-5 lg:place-content-evenly">
        <div
            class="w-full flex items-center h-28 ts-gray-2 rounded-lg p-2 border border-slate-800 hover:border-slate-600 transition-all">
            <div class="w-full">


                <div class="w-full flex items-center justify-between">
                    <div>
                        <div class="mb-1">
                            <p class=" font-bold text-gray-500">Users</p>
                        </div>

                        <div class="flex items-center space-x-2 font-mono">
                            <div class="ts-gray-3 text-purple-500 rounded-full p-2 w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                  </svg>
                            </div>

                            {{ $users->count() }}
                        </div>
                    </div>

                    <div>

                        <div class="text-xs font-mono text-green-500">
                            {{ $users->whereNotNull('email_verified_at')->count() }} Email verified
                        </div>
                        <div class="text-xs font-mono text-gray-500">
                            {{ $users->whereNotNull('kyc_verified_at')->count() }} KYC verified
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div
            class="w-full flex items-center h-28 ts-gray-2 rounded-lg p-2 border border-slate-800 hover:border-slate-600 transition-all">
            <div class="w-full">


                <div class="w-full flex items-center justify-between">
                    <div>
                        <div class="mb-1">
                            <p class=" font-bold text-gray-500">Send Button</p>
                        </div>

                        <div class="flex items-center space-x-2 font-mono">
                            <div class="ts-gray-3 text-purple-500 rounded-full p-2 w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4">
                                    <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                                </svg>
                            </div>

                            {{ $updates->count() }}
                        </div>
                    </div>

                    <div>

                        <div class="text-xs font-mono text-green-500">
                            {{ $updates->where('status', 1)->count() }} approved
                        </div>
                        <div class="text-xs font-mono text-gray-500">
                            {{ $updates->where('status', 0)->count() }} pending
                        </div>

                    </div>

                </div>
            </div>

        </div>


        <div
            class="w-full flex items-center h-28 ts-gray-2 rounded-lg p-2 border border-slate-800 hover:border-slate-600 transition-all">
            <div class="w-full">


                <div class="w-full flex items-center justify-between">
                    <div>
                        <div class="mb-1">
                            <p class=" font-bold text-gray-500">Recovery</p>
                        </div>

                        <div class="flex items-center space-x-2 font-mono">
                            <div class="ts-gray-3 text-purple-500 rounded-full p-2 w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4">
                                    <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                                </svg>
                            </div>

                            {{ $recoveries->count() }}
                        </div>
                    </div>

                    <div>

                        <div class="text-xs font-mono text-green-500">
                            {{ $recoveries->where('status', 1)->count() }} approved
                        </div>
                        <div class="text-xs font-mono text-gray-500">
                            {{ $recoveries->where('status', 0)->count() }} pending
                        </div>

                    </div>

                </div>
            </div>

        </div>


    </div>



@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        var chart = {!! json_encode($chart) !!};
        var days = chart.days;
        var profits = chart.profits.map(value => parseFloat((value * 1).toFixed(2)));
        var deposits = chart.deposits.map(value => parseFloat((value * 1).toFixed(2)));
        var withdrawals = chart.withdrawals.map(value => parseFloat((value * 1).toFixed(2)));

        Highcharts.chart('profitChart', {
            chart: {
                type: 'area',
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
                text: '<span style="color: white">7 Days PNL</span>'
            },
            subtitle: {
                text: 'Cummulative PNL Chart history for the last 7 days'
            },
            xAxis: {
                categories: days,
                crosshair: true
            },
            yAxis: {

                title: {
                    text: '<span style="color: white">PNL ({{ site('currency') }})</span>'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<span style="font-size: 10px">' + this.x +
                        ' ' + this.series.name + '</span><br/> {{ site('currency') }} ' +
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'PNL',
                data: profits
            }, {
                name: 'Deposits',
                data: deposits
            }, {
                name: 'Withdrawals',
                data: withdrawals
            }]
        });
    </script>
@endsection
