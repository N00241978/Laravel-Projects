<x-app-layout>
    <x-customer-details :name="$customer->name" :email="$customer->email" :phone="$customer->phone"
        :address="$customer->address" :image="$customer->image" :accounts="$accounts" />
</x-app-layout>