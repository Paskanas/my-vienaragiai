const Laivas = (props) => {
  const values = props.values;
  return values.map((value, i) => (
    <div
      style={{
        color: value.color,
        backgroundColor: 'cyan',
      }}
      key={i}
    >
      {value.name}
    </div>
  ));
};

export default Laivas;
