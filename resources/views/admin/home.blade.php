@extends('layouts.admin')
@section('content')
    <div class="p-10 bg-gray-200 text-gray-700">
        <div class="relative w-[400px] overflow-hidden">
            <input type="checkbox"
                class="
                    peer
                    absolute
                    top-0
                    inset-x-0
                    w-full
                    h-12
                    opacity-0
                    z-10
                    cursos-pointer
                ">
            <div class="bg-blue-500 h-12 w-full pl-5 flex items-center">
                <h1 class="text-lg font-semibold text-white">
                    Que xuxa es tailwind?
                </h1>
            </div>
            {{-- Flechita --}}
            <div
                class="
                absolute top-3 right-3
                text-white
                transition-transform duration-500
                peer-checked:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                </svg>
            </div>

            {{-- Content --}}
            <div class="bg-white overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-40">
                <div class="p-4">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure sunt beatae nulla assumenda odit.
                        Aperiam
                        quibusdam iure cum quaerat voluptate esse sit, eius fugit odio veritatis quos ex, quis dolorum.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="card bg-blueGray-100 w-full">
            <div class="card-header">
                <div class="card-row">
                    <h6 class="card-title">
                        Dashboard
                    </h6>
                </div>
            </div>
            <div class="card-body">
                <p class="pt-3">You are logged in!</p>
            </div>
        </div>
    </div>
@endsection
