<h3>Dang ky tai khoan phu huynh</h3>

<form action="{{ route('auth.register') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Email</label>
        <input type="text"
          class="form-control" name="email" value="{{ old('email') }}">
          @error('email')
          <li class="thongbao " style="color: red;">
              {{ $message }}
          </li>
          @enderror
         <button type="submit">Tạo tài khoản</button>
    </div>
</form>