const Valtis = (props) => {
  const values = props.values;
  return values.map((value, i) => (
    <div
      style={{
        color: value.color,
        backgroundColor: 'gold',
      }}
      key={i}
    >
      {value.name}
    </div>
  ));
};

export default Valtis;
