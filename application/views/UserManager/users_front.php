<h1>User Manager</h1>

<div class="panel panel-primary">

    <div class="panel-heading">

        <h3 class="panel-title">Users</h3>

    </div>

    <div class="panel-body">

        <table>
            <tr style="font-weight: bold;">
                <td><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span></p></td>
                <td><p>Sukunimi</p></td>
                <td><p>Etunimi</p></td>
                <td><p>User ID</p></td>
                <td><p>Toiminnot</p></td>
            </tr>

            <?php
            foreach ($users as $user) {

                echo "<tr>";
                echo '<td><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span></p></td>';
            echo "<td><p>" . $user->user_lastname . "</p></td>
            <td><p>" . $user->user_firstname . "</p></td>
            <td><p>" . $user->user_id . "</p></td>
            <td><p>" . anchor("UserManager/edit/" . $user->user_id, "<span class=\"glyphicon glyphicon-cog\" aria-hidden=\"true\"></span>") . "</p></td>
                
                </tr>";
            }
            ?>


        </table>

    </div>
</div>