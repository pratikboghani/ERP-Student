a-stu_unique_id		-unique
b-stu_title
c-stu_first_name
d-stu_middle_name
e-stu_last_name		
f-stu_gender
g-stu_dob
h-stu_email_id		-unique
i-stu_bloodgroup
j-stu_birthplace
k-stu_religion
l-stu_admission_date		
m-stu_languages
n-stu_mobile_no
o-stu_info_stu_master_id	-foreign key
p-		stu_cadd
q-		stu_cadd_city		-foreign key
r-		stu_cadd_state		-foreign key
s-		stu_cadd_country	-foreign key
t-		stu_cadd_pincode		
u-		stu_cadd_house_no
v-		stu_cadd_phone_no
w-		stu_padd
x-		stu_padd_city		-foreign key
y-		stu_padd_state		-foreign key
z-		stu_padd_country	-foreign key
aa-		stu_padd_pincode		
ab-		stu_padd_house_no
ac-		stu_padd_phone_no
ad-d-stu_docs_details
ae-stu_docs_category_id			-foreign key (document_category)
af-stu_docs_path
ag-stu_docs_status
ah-stu_docs_stu_master_id		-foreign key
ai-		stu_category_name
aj-		is_status
ak-guardian_name
al-guardian_relation
am-guardian_mobile_no
an-guardian_phone_no
ao-guardian_qualification
ap-guardian_occupation
aq-guardian_income
ar-guardian_email	-unique
as-guardian_home_address
at-guardian_office_address
au-is_emg_contact
av-guardia_stu_master_id		-foreign key
aw-is_status
ax-		stu_master_stu_info_id		-foreign key		-unique
ay-		stu_master_user_id			-foreign key		-unique
az-		stu_master_nationality_id	-foreign key		
ba-		stu_master_category_id		-foreign key
bb-		stu_master_course_id		-foreign key
bc-		stu_master_batch_id			-foreign key
bd-		stu_master_section_id		-foreign key
be-		stu_master_stu_status_id	
bf-		stu_master_stu_address_id	-foreign key
bg-		is_status
bh-stu_status_name					-unique
bi-stu_status_description
bj-is_status




make an entry into database before use website,line by line.
country
state
city
courses
batches
document category
nationality
section
users
stu_address
stu_category
stu_info
stu_master