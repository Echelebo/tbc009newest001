@extends('layouts.fronty')

@section('contents')
    <div class="container-fluid">

        <!-- start page title -->

        <!-- end page title -->
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Promotional Tools</h5>
                <div class="card-body">

                    <div class="row">
                        <p>Click on referral link to copy</p>
                        <div class="col-md-12"
                            data-copy="{{ route('user.register', ['ref' => user()->username ?? 'notset']) }}">
                            {{ route('user.register', ['ref' => user()->username ?? 'notset']) }}
                        </div>
                    </div>

                    <br><br><br>
                </div>
            </div>
        </div>
    @endsection
