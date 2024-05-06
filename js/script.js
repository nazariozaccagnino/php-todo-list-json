import {todo} from './data.js'

const {createApp} = Vue;

createApp({
    data(){
        return{
            todo : todo,
            itemText : '',
            
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
            this.itemText ='';
        },
        flushArray(){
            this.todo.length = 0;
        }
    },
    mounted(){
        // console.log(this.todo);
    }
}).mount('#app')