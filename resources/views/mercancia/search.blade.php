{!!Form::open(array('url'=>'mercancia', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
    <div class="form-group">
        <div class="input-group">

            <input type="text" name="searchText" class="form-control" placeholder="Consultar por: referencia de la mercancia" value="{{$searchText}}">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
        </div>
    </div>
</form>
{{Form::close()}}