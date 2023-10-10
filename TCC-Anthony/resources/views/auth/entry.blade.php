<x-layout title='Entry'>
    <form method="POST" action="/entry">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Log In</button>
    </form>
    <form method="POST" action="{{ route('signup.post') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Log In</button>
    </form>
</x-layout>