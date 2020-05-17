@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="col-span-2 p-6 bg-gray-400 text-center" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <!-- LOAD BLADE COMPONENT -->
  <x-user-heading/>

  @auth
    <div class=" m-4 break-words text-2xl text-primary text-center font-medium uppercase">
      @lang('your exchanges')
    </div>

    <?php
    if (isset($userName)){
      $userId = App\User::where('name',$userName)->pluck('id');
      // Eloquent Get Exchanges of actual user
      // (search user as buyer or seller)
      $exchanges = App\Exchanges
          ::where('id_buyer', $userId)
          ->orWhere('id_seller', $userId)
          ->orderBy('id', 'desc')->get();
    }else{
      $exchanges = App\Exchanges::orderBy('id', 'desc')->get();
    }
    ?>

    {{-- Feed exchange data --}}
    <script>
      window.iproexchange = [];
      @foreach ($exchanges as $exchange)

        <?php
        // Initial data set and check if exists
        if ($exchange->getRating){
          $rating = $exchange->getRating->rating;
        }else{
          $rating = 0;
        }

        if ($exchange->getRating){
          $comment = $exchange->getRating->comment;
        }else{
          $comment = "";
        }

        if ($exchange->status){
          $status = $exchange->status;
        }else{
          $status = 0;
        }
        ?>

        window.iproexchange[{{$exchange->id}}] = {
            rating: {{ $rating }},
            comment: "{{ $comment }}",
            status: "{{ $status }}"
        }
      @endforeach
    </script>

      @foreach ($exchanges as $exchange)
        <div class="mb-6 shadow-md">
            <exchange-block
              id="{{ $exchange->id }}"
              concept="{{ $exchange->concept }}"
              :seller-user="{{$exchange->getSellerUser}}"
              :buyer-user="{{$exchange->getBuyerUser}}"
              amount="{{ $exchange->amount }}"
              created="{{ $exchange->created_at->diffForHumans() }}"
              :creator-user-id="{{$exchange->getCreatorUser->id}}"
              :actual-user-id="{{Auth::user()->id}}"
              seller-gravatar="{{ gravatar($exchange->getSellerUser->email) }}"
              buyer-gravatar="{{ gravatar($exchange->getBuyerUser->email) }}"
              >
            </exchange-block>
        </div>
      @endforeach


  @endauth

@endsection
