@extends('layout.vendor')

@section('title')
{{__('Your Rejected Requests')}}
@endsection

@section('content')
<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr class="txt4">
                <th>#</th>
                <th>{{__('Method')}}</th>
                <th>{{__('Account Title')}}</th>
                <th>{{__('Account No.')}}</th>
                <th>{{__('Amount')}}</th>
                <th>{{__('Status')}}</th>
            </tr>
        </thead>
        <tbody>
            @php($key=1)
            @foreach (Auth::user()->withdrawAccounts as $account)
                @foreach ($account->rejectedWithdrawReuqests() as $request)
                <tr class="txt4">
                    <td>{{ $key }}</td>
                    <td>{{$request->withdrawAccount->withdrawMethod->name}}</td>
                    <td>{{$request->withdrawAccount->title}}</td>
                    <td>{{$request->withdrawAccount->account_no}}</td>
                    <td>{{$request->amount}}</td>
                    <td>
                        @if ($request->status == 2)
                            <span class="badge badge-primary txt4">{{__('Rejected')}}</span>
                        @endif
                    </td>
                </tr>
                @php($key++)
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

@endsection