<h1>Add mem to db</h1>
<form action="add" method="post">
    @csrf
    <input type="text" name="name" placeholder="name"> <br> <br>
    <input type="text" name="email" placeholder="email"> <br> <br>
    <button type="submit">Add</button>
</form>