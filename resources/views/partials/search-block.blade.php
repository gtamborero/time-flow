<!-- SEARCH BLOCK -->
<div class=" p-8 my-5 break-words text-xl text-primary text-center font-medium bg-white">
  <div class="uppercase text-3xl pb-4">@lang('Search user, phone, skills, profession')...</div>

    <form method="get" action="/search">
    {{csrf_field()}}
      <input class="shadow appearance-none
      border border-red-500 rounded w-full lg:w-1/2 py-2 px-3 text-gray-700 mb-3 leading-tight
      focus:outline-none focus:shadow-outline text-center"
      name="search"
      value=""
      type="text"
      placeholder="@lang('Example: Programmer, designer')...">

      <div class="flex items-center justify-between text-center">
         <input type="submit" class="mt-2 bg-primary hover:bg-primary-light
         w-full lg:w-1/2 text-white font-normal py-2 px-4 rounded
         focus:outline-none focus:shadow-outline cursor-pointer mx-auto uppercase" type="button" value="@lang('Search')">
         </input>
      </div>
    </form>
</div>
