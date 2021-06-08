@extends('layout.admin')

@section('title')
    Company Transactions
@endsection

@section('content')
    <div class="card">

        <table class="table datatable-save-state table-responsive">
            <thead>
                <tr class="txt4">
                    <th>TID</th>
                    <th>Name</th>
                    <th>Opening</th>
                    <th>Closing</th>
                    <th>Amount</th>
                    <th>Nature</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $key => $transaction)
                <tr class="txt4">
                    
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->account->owner->name}}</td>
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
                    <th>--</th>
                    <th>Total</th>
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