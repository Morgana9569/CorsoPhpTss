import { useState } from "react"

const SearchBar = (props) => {

   // Hook useState  const tasKName | const setTaskName
   // taskName è la variabile che contiene lo stato attuale
   // setTaskName è la funzione che devo invocare ogni volta che devo comunicare a react che
   // il valore di taskName è cambiato 
   const [taskName,setTaskName] = useState('')
   const [taskDueDate,setTaskDueDate] = useState('')

    function onAddTask() {
        const newTask = {
            name:taskName.trim(),
            due_date:taskDueDate,
            done:false
        }
        props.parentAddTask(newTask)
        setTaskName('')
    }


    return (
        <section className="container">
            
                <div className="new_task">
                   
                    <label className="tasks" htmlFor="task-label"></label>
                    {/* var taskName = document.getElementById("mySelect").value; */}
                    {/* [ ] assegnare una variabile di stato al value */}
                    {/* [ ] assegnare onChange */}
                    <input type="text" 
                           className="task-control" 
                           value={taskName}
                           onChange={ evento => {
                                //evento target è il campo di input
                                setTaskName(evento.target.value)
                            }}
                           
                           name="tasks" 
                           id="tasks" 
                           placeholder="new task/search" 
                        />


                    <button type="submit"
                            onClick={onAddTask} 
                            disabled={!taskName.trim().length>0}
                            className="task-button"
                            ><strong>Add</strong>
                    </button>
                </div>
                <div>
                {!taskName.trim().length>0 ? 'Devi inserire un titolo':' '}
                </div>
                <div className="date">
                    
                    <input className="date-task"
                           value={taskDueDate}
                           onChange={evento => setTaskDueDate(evento.target.value)}
                           type="date" />
                </div>
            </section>
    )
}

export default SearchBar
