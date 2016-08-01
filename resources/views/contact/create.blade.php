<form action="/contact" method="POST">
    {{ csrf_field() }}
    <div>
        <label>Name:</label> 
        <input type="text" name="name">
    </div>
    <div>
        <label>Email:</label> 
        <input type="text" name="email">
    </div>
    <div>
        <label>Message:</label> 
        <textarea type="text" name="message"></textarea>
    </div>
    <div>
        <button type="submit">Contact</button>
    </div>
</form>
