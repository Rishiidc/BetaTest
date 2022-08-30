const url = 'https://docs.google.com/spreadsheets/d/14MzDzLHJVmg_KOjzM75dXVv1m0gW9yVzpH1yz07dOds/gviz/tq?';

fetch(url)
.then(res => res.text())
.then(rep => {
    data = JSON.parse(rep.substring(47).slice(0, -2));
    var rid_first = 0;
    var content = data.table.rows;
    content.forEach(element => {
        element.c.forEach((inner_content, index) => {
            if (rid_first < 2){
                rid_first += 1;
            }else{
                if(index == 1){
                    const new_container = document.getElementById('notif_content');

                    const new_notif =document.createElement('div');
                    new_notif.classList.add('notif_example');

                    new_container.appendChild(new_notif);

                    //making the new new notification
                    const notif_text = document.createElement('div');
                    notif_text.classList.add('text');
                    notif_text.innerText = `${inner_content["v"]}`;
                    new_notif.appendChild(notif_text);

                    const notif_underline = document.createElement('div');
                    notif_underline.classList.add('underline');
                    new_notif.appendChild(notif_underline);
                }
            }
        });
    });
});