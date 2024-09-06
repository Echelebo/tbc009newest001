@extends('layouts.fronty')

@section('contents')
    <div class="container-fluid">
        <!-- start page title -->

        <!-- end page title -->
        <div class="col-sm-12">
            <div class="card" id="pageContent">
                <h5 class="card-header bg-primary text-white">Your Referrals
                </h5>
                <div class="card-body">

                    <br>
                    <br>
                    <table width="300" cellspacing="1" cellpadding="1">
                        <tbody>
                            <tr>
                                <td class="item">Referrals:</td>
                                <td class="item">{{ user()->referredUsers->count() }}</td>
                            </tr>
                            <tr>
                                <td class="item">Active referrals:</td>
                                <td class="item">{{ user()->referredUsers->count() }}</td>
                            </tr>
                            <tr>
                                <td class="item">Total referral commission:</td>
                                <td class="item">${{ number_format($referralsx, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
