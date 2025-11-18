declare namespace App.Data {
export type CommentData = {
id: number;
text: string;
user?: App.Data.UserData;
userId: number | null;
postId: number | null;
};
export type FriendData = {
id: number;
firstname: string;
lastname: string;
picId: number | null;
created_at: string;
};
export type PostData = {
id: number;
text: string;
image: string | null;
created_at: string;
user?: App.Data.UserData;
comments?: Array<App.Data.CommentData>;
};
export type UserData = {
id: number;
name: string;
email?: string;
image: string;
friends?: Array<App.Data.FriendData>;
};
}
