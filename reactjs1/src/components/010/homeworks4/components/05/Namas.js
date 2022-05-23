const Namas = (props) => {
  return (
    <div
      key={Date.now()}
      style={{
        color: props.values.color,
      }}
    >
      {props.values.name}
    </div>
  );
};

export default Namas;
