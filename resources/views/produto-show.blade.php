<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        
    </head>
    <body class="content">
    <div class="container">

            <div class="col col-lg-12">
                <div class="flex justify-center">
                <div class="mt-12">
                    <div class="grid grid-cols-12 md:grid-cols-12 gap-12 lg:gap-12">
                        
                        <div>
                            <div>
                                

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Alterar Produto</h2>
                                <br>
                                <form action="/alterar-produtos/{{$produto->id}}" method="POST" enctype="multipart/form-data">    
                                @csrf
                                    <div class="col col-lg-12 row">
                                        <div class="col col-lg-4">    
                                            <label for="nome" class="form-label">Nome Produto:</label>
                                            <input type="text" value="{{$produto->nome}}" class="form-control" id="nome" placeholder="Nome do Produto" name="nome">
                                        </div>
                                        <div class="col col-lg-4">
                                            <label for="sku" class="form-label">Sku:</label>
                                            <input type="text" value="{{$produto->sku}}" class="form-control" id="sku" placeholder="Sku do Produto" name="sku">
                                        </div>

                                        <div class="col col-lg-4">
                                            <label for="descricao" class="form-label">Descricao:</label>
                                            <input type="text" value="{{$produto->descricao}}" class="form-control" id="descricao" placeholder="Descrição do Produto" name="descricao">
                                        </div>    
                                    </div>

                                    <div class="col col-lg-12 row">
                                        

                                        <div class="col col-lg-4">
                                            <label for="estoque" class="form-label">Estoque:</label>
                                            <input type="text" value="{{$variacao->estoque}}" class="form-control" id="estoque" placeholder="Estoque do Produto" name="estoque">
                                        </div>

                                        <div class="col col-lg-4">
                                            <label for="preco" class="form-label">Preço:</label>
                                            <input type="text" value="{{$variacao->preco}}" class="form-control" id="preco" placeholder="Preço do Produto" name="preco">
                                        </div>

                                        <div class="col col-lg-4">
                                            <label for="tipo_variacao" class="form-label">Variação:</label>
                                            <select name="tipo_variacao" id="tipo_variacao" class="form-select">
                                                <option selected="selected" value="{{$variacao->tipo_variacao}}">{{$variacao->tipo_variacao}}</option>
                                                <option value="cor">Cor</option>
                                                <option value="tamanho">Tamanho</option>
                                                <option value="cor_tamanho">Cor e Tamanho</option>
                                            </select>
                                        </div>
                                    </div>    

                                    <div class="col col-lg-12 row">
                                        <div class="col col-lg-12">
                                            <label for="descricao_variacao" class="form-label">Descrição Variação:</label>
                                            <input type="text" value="{{$variacao->descricao_variacao}}" class="form-control" id="descricao_variacao" placeholder="Descrição Variação" name="descricao_variacao">    
                                        </div>
                                    </div>    
                                    <div class="col col-lg-12 row">
                                        <div class="col col-lg-4"><br><br>
                                                <label for="fotos" class="form-label">Foto:</label>
                                                <input type="file" class="form-control-file" id="fotos" placeholder="Foto do Produto" name="fotos">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                    <img src="../img/produto/{{$produto->id}}/{{$produto->fotos}}" class="card-img-top" alt="{{$produto->descricao}}">
                                        <div class="card-body">
                                            <p class="card-text">{{$produto->nome}}</p>
                                        </div>
                                    </div>

                                    <br><br>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                                <br><br><br><br>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>       
    </body>
</html>