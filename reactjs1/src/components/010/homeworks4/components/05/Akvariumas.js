const Akvariumas = (props) => {
  return (
    <div
      key={props.id}
      style={{
        color: props.values.color,
      }}
    >
      {props.values.name}
    </div>
  );
};

export default Akvariumas;
