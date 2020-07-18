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
