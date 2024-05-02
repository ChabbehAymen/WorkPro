<form class="z-10 w-72 h-max bg-white fixed top-0 left-0 p-4 -m-80 shadow-lg flex flex-col gap-5"
      id="createProjectPopup" method="POST" action="{{route('create.project')}}" style="margin-left: 40%">
    @csrf
    <img width="15" height="15" src="https://img.icons8.com/material-two-tone/24/cancel--v1.png" alt="cancel--v1"
         class=" opacity-80 absolute right-0 top-0 m-3 cursor-pointer hover:opacity-50" id="cancel-popup"/>
    <h1 class="mx-auto text-lg font-semibold self-center">As easy as That</h1>
    <label>
        Project Title <br>
        <input type="text" class="border border-black form-control" name="title">
    </label>
    <button type="submit" class="btn btn-dark bg-black">Create</button>
</form>
