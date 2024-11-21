<form action="{{ route('personal_borrar', $personal->id_personal) }}" method="POST" 
onsubmit="return confirm('¿Estás seguro de que deseas eliminar este personal?');">
    @csrf
    @method('DELETE')
    
    <button type="submit">Eliminar</button>
    <a href="{{ route('personal') }}">
</form>
