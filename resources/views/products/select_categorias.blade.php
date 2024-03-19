<select name="id_categoria" id="" class="form-select">
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
    @endforeach
</select>