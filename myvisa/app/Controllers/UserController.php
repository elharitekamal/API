<?php
header('Accsess-controle-Allow-Origne: *');
header('Content-type: aplication/json');
header('Access-Control-Allow-headers: access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Autorization,X-Requested');
class UserController extends User
{

    public function read_data()
    {
        $result = $this->read();

        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $post_arr = array();
            $post_arr['data'] = array();

            while ($row = mysqli_fetch_assoc($result)) {
                extract($row);

                $post_item = array(
                    'id_user' => $id_user,
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'nationality' => $nationality,
                );
                array_push($post_arr['data'], $post_item);
            }
            echo json_encode($post_arr);
        } else {
            echo json_encode(array('message' => 'no data found'));
        }

    }


    public function read_single_data($id)
    {
        $this->id = isset($id) ? $id : die();
        $this->readOne($id);

        $post_arr = array(
            'id_user' => $this->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'nationality' => $this->nationality
        );
        print_r(json_encode($post_arr));

    }

    public function add()
    {

        $data = json_decode(file_get_contents("php://input"));

        $this->id = $data->id_user;
        $this->last_name = $data->last_name;
        $this->first_name = $data->first_name;
        $this->nationality = $data->nationality;

        if ($this->insert()) {
            echo json_encode(array('message => data saved'));
        } else {
            echo json_encode(array('message => data not saved'));
        }


    }

}