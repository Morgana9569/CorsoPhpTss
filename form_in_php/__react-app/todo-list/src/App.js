
// import { useState } from 'react';
import './App.css';

import TaskItem from "./components/TaskItem/TaskItem";
import TaskList from './components/TaskList/TaskList';
import SearchBar from './components/SearchBar';
import { addTask, removeTask } from './service/TodoService';
import { useState } from 'react';

function App() {

const [taskListData,setTaskListData] = useState([
    
  { 
  name:"comprare il latte",
  user_id:12,
  id:11,
  due_date:"2023-04-25",
  done:true
  },
  {
  name:"comprare il dentifricio",
  user_id:12,
  id:12,
  due_date:"2023-04-25",
  done:false
  }, 
  {
  name:"comprare il la farina",
  user_id:10,
  id:13,
  due_date:"2023-04-22",
  done:true
  },
]);

function parentAddTask(newTask){
  const newTaskListData = addTask(newTask,taskListData)
  setTaskListData(newTaskListData)
}

function parentRemoveTask(taskId){
       console.log("parentRemoveTask "+taskId)
       const res = removeTask(taskId,taskListData)
       setTaskListData(res)
}
  
function onShowCompleted() {
    // chiamo il servizio 
    // aggiorno lo stato
}
function onShowAll() {
    // chiamo il servizio 
    // aggiorno lo stato
}
    
function onShowActive() {
    // chiamo il servizio 
    // aggiorno lo stato
}
    
return (
  <main>
    <SearchBar  parentAddTask={parentAddTask}></SearchBar>

    <button onClick={onShowAll}>all</button>
    <button onClick={onShowActive}>active</button>
    <button onClick={onShowCompleted}>comleted</button>
    {/* <button onClick={aggiungiTask}>Add Task</button> */}
    <TaskList header={'Paolo'} tasks={taskListData}>
      {taskListData.map( task => <TaskItem 
                                    key={task.id} 
                                    parentRemoveTask={parentRemoveTask}
                                    id={task.id}   
                                    done={task.done} 
                                    nome_task={task.name} 
                                    /> )}
    </TaskList>
  </main>
)
}

export default App;
