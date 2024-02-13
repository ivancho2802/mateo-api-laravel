<form method="POST" action="{{route('api/login')}}" >
@csrf
<!-- Email input -->
<div class="form-outline mb-4 mt-5">
<input placeholder="Enter email" type="text" name="email" id="loginName" class="form-control" />
</div>
<!-- Password input -->
<div class="form-outline mb-4">
<input placeholder="Enter password" type="text" name="password" id="loginPassword" class="form-control" />
</div>
<input type="hidden" name="to" id="to" value="view" />
<!-- Submit button -->
<button type="submit" class="btn btn-primary btn-block mb-4">Iniciar sesion</button>
</form>