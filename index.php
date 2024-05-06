<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="js/script.js" type="module"></script>

    <title>To-do list</title>
</head>

<body>
    <div id="app">
        <header class="bg-info-subtle d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="./img/png-checkmark.png" alt="check">
                <h1>To-do List</h1>
            </div>
            <button type="button" class="btn btn-danger" @click="flushArray">Svuota Lista</button>
        </header>
        <main class="container">
            <h2 class="text-center">Lista</h2>
            <ul class="list-group" v-for="(item,index) in todo" :key="item.id">
                <li class="list-group-item d-flex justify-content-between" :class="{'bg-success-subtle':item.done}">
                    <div @click="toggleDone(item.id)">
                        <span class="mx-2 pointer"
                            :class="{'text-decoration-line-through':item.done}">{{item.text}}</span>
                    </div>
                    <span @click="removeItem(item.id)"><i class="fa-solid fa-eraser"></i></span>
                </li>
            </ul>
            <div class="mb-3">
                <h2 class="text-center">Aggiungi elemento</h2>
                <div class="d-flex">
                    <input type="text" class="form-control me-2" id="exampleFormControlInput1"
                        placeholder="Inserisci item" v-model="itemText" @keyup.enter="addItem">
                    <button type="button" class="btn btn-success" @click="addItem">Aggiungi</button>
                </div>
            </div>

        </main>
    </div>

</body>

</html>