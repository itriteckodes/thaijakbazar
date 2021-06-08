@extends('layout.user')

@section('title')
    {{__('Your Transactions')}}
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Opening')}}</th>
                    <th>{{__('Closing')}}</th>
                    <th>{{__('Amount')}}</th>
                    <th>{{__('Nature')}}</th>
                    <th>{{__('Debit')}}</th>
                    <th>{{__('Credit')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Date')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $key => $transaction)
                <tr class="txt4">
                    <td>{{$key+1}}</td>
                    <td>{{$transaction->opening}}</td>
                    <td>{{$transaction->closing}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->nature}}</td>
                    <td>{{$transaction->debit}}</td>
                    <td>{{$transaction->credit}}</td>
                    <td>{{$transaction->description}}</td>
                    <td>{{$transaction->created_at->format('d/m/Y')}}</td>
 

                </tr>
                @endforeach
                
               
            </tbody>
            <tfoot>
                <tr class="txt4">
                    <th>#</th>
                    <th>{{__('Total')}}</th>
                    <th>--</th>
                    <th>--</th>
                    <th>--</th>
                    <th>{{$debit_sum}}</th>
                    <th>{{$credit_sum}}</th>
                    <th>--</th>
                    <th>--</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection