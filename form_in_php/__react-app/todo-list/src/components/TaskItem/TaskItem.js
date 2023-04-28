// const { nome_task, done }= props
// props.done, props.nome_task

import { useState } from "react"


function TaskItem({ nome_task, done,id,parentRemoveTask }){
    const [doneCheckbox,setDoneCheckbox]=useState(done)

    function onRemoveTask(){
            console.log("task "+id)
            parentRemoveTask(id)
    }

    function onUpdateStatus(event) {
            
        
    }

    return (
        <li className={done ? 'task_gia_fatta': ''}>
            {doneCheckbox ? <h1>FATTO</h1> :  <h1>DA FARE</h1> }
            <input onChange={(event)=>setDoneCheckbox(event.target.checked)}
                   checked={doneCheckbox}
                  
                   type="checkbox" />
             {done}
            <label>{ nome_task }</label>
            <input type="text" defaultValue="Go Siihopping" />
            <button className="edit">Edit</button>
            <button className="delete" onClick={onRemoveTask} >Delete</button>
      </li>
    )
}

export default TaskItem;
