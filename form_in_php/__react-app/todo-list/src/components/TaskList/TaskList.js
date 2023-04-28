const TaskList = (props) => {
    // commento
    return (
        <>
         {/* fragment */}
         <h3 className="task_list__header">{props.header} {props.tasks.length} </h3>
         <ul className="task_list__list">
            {props.children}
         </ul>
        </>
    )

}

export default TaskList
