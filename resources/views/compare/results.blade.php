@extends('layout.mainlayout')
 
@section('content')
    <div class="text-muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Wyniki porównania:</h1>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            @foreach($results as $result)
                                <th>
                                    <a href="<?=$result['html_url'];?>" target="_blank">
                                        <?=$result['name'];?>
                                    </a>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <strong>Autor:</strong>
                            </th>
                            @foreach($results as $result)
                                <td>
                                    <a href="<?=$result['owner']['html_url'];?>" target="_blank">
                                        <?=$result['owner']['login'];?>
                                    </a>
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <th scope="row">
                                <strong>Informations:</strong>
                            </th>
                            @foreach($results as $result)
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><strong>Language:</strong></td>
                                                <td><?=$result['language'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Watch:</strong></td>
                                                <td><?=$result['subscribers_count'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Star:</strong></td>
                                                <td><?=$result['stargazers_count'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fork:</strong></td>
                                                <td><?=$result['network_count'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Last release:</strong></td>
                                                <td><?=date("Y-m-d H:i:d", strtotime($result['updated_at']));?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Open issues:</strong></td>
                                                <td><?=$result['open_issues_count'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection