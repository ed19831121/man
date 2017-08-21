序号 	方法					描述
1 	void 	and(	BitSet set)				对此目标位 set 和参数位 set 执行	`逻辑与`	操作。
19 	void 	or(	BitSet bitSet)				对此位 set 和位 set 参数执行		`逻辑或`	操作。
26 	void 	xor(	BitSet bitSet)				对此位 set 和位 set 参数执行		`逻辑异或`	操作。
2 	void 	andNot(	BitSet set)				`清除`此 BitSet 中所有的位，其相应的位在指定的 BitSet 中已设置。
3 	int 	cardinality( )					返回此 BitSet 中设置为 true 的位数。
16 	int 	length( )					返回此 BitSet 的"逻辑大小"：BitSet 中最高设置位的索引加 1。
24 	int 	size( )						返回此 BitSet 表示位值时实际使用空间的位数。
4 	void 	clear( )					将此 BitSet 中的所有位设置为 false。
5 	void 	clear(	int index)				将索引指定处的位设置为 false。
20 	void 	set(	int index)				将指定索引处的位设置为 true。
11 	boolean get(	int index)					返回指定索引处的位值。
6 	void 	clear(	int startIndex, int endIndex)		将指定的 fromIndex（包括）到指定的 toIndex（不包括）范围内的位设置为 false。
12 	BitSet 	get(	int startIndex, int endIndex)		返回一个新的 BitSet，它由此 BitSet 中从 fromIndex（包括）到 toIndex（不包括）范围内的位组成。
22 	void 	set(	int startIndex, int endIndex)		将指定的 fromIndex（包括）到指定的 toIndex（不包括）范围内的位设置为 true。
10 	void 	flip(	int startIndex, int endIndex)		将指定的 fromIndex（包括）到指定的 toIndex（不包括）范围内的每个位设置为其当前值的补码。
23 	void 	set(	int startIndex, int endIndex, boolean v)	将指定的 fromIndex（包括）到指定的 toIndex（不包括）范围内的位设置为指定的值。
7 	Object 	clone( )						复制此 BitSet，生成一个与之相等的新 BitSet。
8 	boolean equals(Object bitSet)					将此对象与指定的对象进行比较。

9 	void 	flip(int index)					将指定索引处的位设置为其当前值的补码。

13 	int 	hashCode( )					返回此位 set 的哈希码值。
14 	boolean intersects(BitSet bitSet)			如果指定的 BitSet 中有设置为 true 的位，并且在此 BitSet 中也将其设置为 true，则返回 ture。
15 	boolean isEmpty( )					如果此 BitSet 中没有包含任何设置为 true 的位，则返回 ture。
17 	int 	nextClearBit(	int startIndex)			返回第一个设置为 false 的位的索引，这发生在指定的起始索引或之后的索引上。
18 	int 	nextSetBit(	int startIndex)			返回第一个设置为 true 的位的索引，这发生在指定的起始索引或之后的索引上。
21 	void 	set(int index, boolean v)			将指定索引处的位设置为指定的值。
25 	String 	toString( )					返回此位 set 的字符串表示形式。
