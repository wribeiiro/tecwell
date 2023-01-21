<x-layout>
    <div class="mx-4">
        <div class="container">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ $listing->logo ? asset('storage/app/public/' . $listing->logo) : asset('/images/no-image.png') }}" alt="Company logo" />
                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <div class="text-lg my-4"><i class="fa-solid fa-location-dot"></i> {{ $listing->location }}</div>
                <div class="justify-content-center mb-2">
                    <span class="badge bg-secondary text-uppercase">
                        <a class="text-decoration-none text-light" href="#!"> {{ $listing->level }}</a>
                    </span>
                    <span class="badge bg-secondary text-uppercase">
                        <a class="text-decoration-none text-light" href="#!"> {{ $listing->contract }}</a>
                    </span>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-2 mt-3">Job Description</h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}
                    </div>
                </div>
                <div class="flex mt-5">
                    <div class="items-center justify-center mr-2">
                        <a href="mailto:{{ $listing->email }}" class="bg-laravel text-white mt-6 p-2 rounded-xl m-2 hover:opacity-80">
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>

                        <a href="{{ $listing->website }}" target="_blank" class="bg-black text-white p-2 rounded-xl m-2 hover:opacity-80">
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
                <a href="{{route('listings.manage')}}" class="btn btn-danger text-light"><i class="fa-solid fa-arrow-left"></i> Back </a>
            </div>
        </div>
    </div>
</x-layout>