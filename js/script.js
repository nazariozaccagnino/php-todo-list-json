//import {todo} from '../data.js'

const {createApp} = Vue;

createApp({
    data(){
        return{
            //todo : todo,
            itemText : '',
            todo:[
                {
                    "id": 1,
                    "text": "default item",
                    "done": false
                }
            ],
            myendpoint: 'server.php',          
        }
    },
    methods: {
        toggleDone(id){
            const item = this.todo.find((el)=>{
                return el.id === id                
            })
            // console.log(item);
            item.done = !item.done
        },
        removeItem(id){
            let index = this.todo.findIndex((el)=> el.id === id)
            // console.log(index);            
            this.todo.splice(index, 1)            
        },
        addItem(){
            const newItem = {
                id: null,
                text: this.itemText,
                done: false
            }
            let nextId = 0;
            this.todo.forEach((el) => {
                if(nextId < el.id){
                    nextId = el.id
                }
            });
            newItem.id = nextId + 1;
            this.todo.push(newItem);

            const data = new FormData();
            data.append('id', newItem.id);
            data.append('text', newItem.text);
            data.append('done', newItem.done);

            axios.post(this.myendpoint, data).then((res)=>{
                console.log(res.data);
            });
            this.itemText ='';
            //console.log(this.todo);

        },
        getData(){
            axios.get(this.myendpoint).then((res)=>{
                this.todo = res.data
            })
        },
        flushArray(){
            this.todo.length = 0;
        }
    },
    mounted(){
        this.getData()
    }
}).mount('#app')