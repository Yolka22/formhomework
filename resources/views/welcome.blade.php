<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" type="text/css" href="../css/app.css">
</head>

<style>
    .formPage {
        background-color: rgb(43, 53, 53);
    }

    form {
        padding: 40px;
    }

    .formSection {
        border-radius: 10px;
        border: 2px solid brown;
        margin-top: 20px;
        padding: 10px
    }

    .field {
        display: flex
    }

    .field div {
        width: 100px
    }
    .formSection{
        color: rgb(255, 255, 255);
        font-size: 1.2rem;
    }
    .headSection{
        color: rgb(254, 150, 58);
        font-size: 1.5rem;
    }
    .animalsField{
        display: grid;
    grid-template-columns: repeat(4, 1fr); 
    grid-template-rows: repeat(2, 1fr);    
    gap: 10px; 
    }
    .sub{
        margin-left: 25%;
        margin-right: 25%;
        cursor: pointer;
        width: 50%;
        background-color: coral;
        color:white;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.2rem;
    }
</style>

<body class="formPage">
    <?php
    
    $contacts = [
        'head' => 'Контактная информация',
        'fields' => [
            'name' => 'Имя',
            'mobile' => 'Телефон',
            'email' => 'Email',
        ],
    ];
    $personalInfo = [
        'head' => 'Персональная информация',
        'fields' => [
            'age' => 'Возраст',
            'gender' => ['Мужчина', 'Женщина'],
            'softSkils' => 'перечислете личные качества',
        ],
    ];
    $animals = [
        'head' => 'Перечислите ваших любимых животных',
        'animals' => ['Зебра', 'Слон', 'Кошак', 'Антилопа', 'Анаконда', 'Голубь', 'Человек', 'Краб'],
    ];
    ?>
    <form action="/submit-form" method="POST">
        <div class="formSection">
            <div class="headSection">{{ $contacts['head'] }}</div>
            <div class="field">
                <div>{{ $contacts['fields']['name'] }}</div>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="field">
                <div>{{ $contacts['fields']['mobile'] }}</div>
                <input type="text" name="mobile" value="{{ old('mobile') }}">
            </div>
            <div class="field">
                <div>{{ $contacts['fields']['email'] }}</div>
                <input type="text" name="email" value="{{ old('email') }}">
            </div>
        </div>
    
        <div class="formSection">
            <div class="headSection">{{ $personalInfo['head'] }}</div>
            <div class="field">
                <div>{{ $personalInfo['fields']['age'] }}</div>
                <input type="text" name="age" value="{{ old('age') }}">
            </div>
            <div class="field">
                <div>Пол</div>
                <select name="gender">
                    @foreach ($personalInfo['fields']['gender'] as $value)
                        <option value="{{ $value }}" {{ old('gender') == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div style="display: flex; flex-direction:column">
                {{ $personalInfo['fields']['softSkils'] }}
                <textarea name="softSkills">{{ old('softSkills') }}</textarea>
            </div>
        </div>
    
        <div class="formSection">
            <div class="headSection">{{ $animals['head'] }}</div>
            <div class="animalsField">
                @foreach ($animals['animals'] as $value)
                    <div>
                        <input type="checkbox" value="{{ $value }}" name="favoriteAnimals[]" {{ is_array(old('favoriteAnimals')) && in_array($value, old('favoriteAnimals')) ? 'checked' : '' }}>
                        {{ $value }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="formSection">
            <input class="sub" type="submit" value="отправить">
        </div>
    </form>
    @if($errors->any())
    <script>
        alert('Заполните все поля');
    </script>
@endif

</body>

</html>
