@extends('layouts.app-master')

@section('title', 'Subscription Plans')

@section('content')
    <h1>Subscription Plans</h1>
    <p class="lead">This is the subscription plans page.</p>
    <div class="row">
        <div class="col">
            <h2>Subscription Plans</h2>
            <p>Here you can see all the subscription plans.</p>
            <table class="table shadow-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscription_plans as $subscriptionPlan)
                        <tr>
                            <th scope="row">{{ $subscriptionPlan->id }}</th>
                            <td>{{ $subscriptionPlan->name }}</td>
                            <td>{{ $subscriptionPlan->duration }}</td>
                            <td>{{ $subscriptionPlan->price }}</td>
                            <td>
                                <a href="{{ route('subscription-plans.edit', $subscriptionPlan->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('subscription-plans.destroy', $subscriptionPlan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <a href="{{ route('subscription-plans.create') }}" class="btn btn-primary">Create a new subscription plan</a> --}}
        </div>
    </div>       

@endsection