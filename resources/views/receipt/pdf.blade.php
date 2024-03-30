@extends('layouts.app')

@section('content')
        <p>Cashier Name: {{ $receipt->payment->order->user->name }}</p>
        <p>Customer Name: {{ $receipt->payment->order->customer->first_name }} {{ $receipt->payment->order->customer->last_name }}</p>
        <p>Total: ₱{{ number_format($receipt->payment->order->total, 2) }}</p>
@endsection